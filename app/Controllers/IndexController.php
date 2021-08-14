<?php

namespace App\Controllers;

use App\Validation\Validator;

class IndexController extends Controller
{
    /**
     * Вернуть стандартную страницу
     */
    public function index()
    {
        $data = $this->db()->query("SELECT * FROM `cards`")->get();

        return $this->view()->render('main', compact('data'));
    }

    /**
     * Удалить карточку
     */
    public function remove()
    {
        $validator = Validator::make($this->request()->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->response()->error('Проверьте правильность введёных вами данных', payload: $validator->errors());
        }
        $request = $validator->validated();

        $this->db()->query("DELETE FROM `cards` WHERE `id` = :id", $request);
        return $this->response()->success('Карточка успешно удалена');
    }

    /**
     * Создать карточку
     */
    public function create()
    {
        $validator = Validator::make($this->request()->all(), [
            'cover' => 'required',
            'title_album' => 'required',
            'title_artist' => 'required',
            'release' => 'required',
            'duration' => 'required',
            'cost' => 'required',
            'buy' => 'required',
            'storage_code' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->response()->error('Проверьте правильность введёных вами данных', payload: $validator->errors());
        }
        $request = $validator->validated();

        $this->db()->query("INSERT INTO `cards` (`cover`, `title_album`, `title_artist`, `release`, `duration`, `cost`, `buy`, `storage_code`) VALUES (:cover, :title_album, :title_artist, :release, :duration, :cost, :buy, :storage_code)", $request);
        $card_id = $this->db()->query("SELECT id FROM cards WHERE id = LAST_INSERT_ID()")->first()['id'];
        return $this->response()->success('Карточка успешно создана', payload: ['id' => $card_id]);
    }

    /**
     * Обновить карточку
     */
    public function edit()
    {
        $validator = Validator::make($this->request()->all(), [
            'id' => 'required',
            'cover' => 'required',
            'title_album' => 'required',
            'title_artist' => 'required',
            'release' => 'required',
            'duration' => 'required',
            'cost' => 'required',
            'buy' => 'required',
            'storage_code' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->response()->error('Проверьте правильность введёных вами данных', payload: $validator->errors());
        }
        $request = $validator->validated();

        $sql = "UPDATE `cards` SET 
                   `cover` = :cover, `title_album` = :title_album, `title_artist` = :title_artist, `release` = :release, `duration` = :duration, 
                   `cost` = :cost, `storage_code` = :storage_code, `buy` = :buy WHERE `id` = :id
        ";
        $this->db()->query($sql, $request);

        return $this->response()->success('Карточка успешно изменена');
    }
}