<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Карточки CD</title>
    </head>

    <body>
        <!--TODO вынести шаблон в отдельный файл мб модалки тоже и скрипты-->

        <!--  Шаблон для создания -->
        <div id="clear" style="display:none">
            <div class="col-md-4 mb-3 item card-id-created">
                <div class="card">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title name"></h5>
                        Название артиста: <p class="card-text artist"></p>
                        Год выпуска: <p class="card-text year"></p>
                        Длительность:< <p class="card-text duration"></p>
                        Дата покупки: <p class="card-text date"></p>
                        Стоимость: <p class="card-text price"></p>
                        Код хранилища: <p class="card-text code"></p>
                        <button type="button" class="btn btn-danger delete">Удалить</button>
                        <button type="button" class="btn btn-warning edit">Изменить</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  Шаблон для создания -->

        <!--    Модалка подтверждения удаления-->
        <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтвердите действие</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить запись?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete-button">Удалить</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    </div>
                </div>
            </div>
        </div>
        <!--    Модалка подтверждения удаления-->

        <!--    Модалка редактирования-->
        <div class="modal" tabindex="-1" role="dialog" id="editModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title modal-create-title">Редактировать карточку</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Ссылка на изображение</label>
                            <input type="email" class="form-control modal-create-image" placeholder="Ссылка на изображение">
                        </div>
                        <div class="form-group">
                            <label>Название</label>
                            <input type="email" class="form-control modal-create-name" placeholder="Название">
                        </div>
                        <div class="form-group">
                            <label>Артист</label>
                            <input type="email" class="form-control modal-create-artist" placeholder="Артист">
                        </div>
                        <div class="form-group">
                            <label>Год выпуска</label>
                            <input type="email" class="form-control modal-create-year" placeholder="Год выпуска">
                        </div>
                        <div class="form-group">
                            <label>Длительность</label>
                            <input type="email" class="form-control modal-create-duration" placeholder="Длительность">
                        </div>
                        <div class="form-group">
                            <label>Дата покупки</label>
                            <input type="email" class="form-control modal-create-date" placeholder="Дата покупки">
                        </div>
                        <div class="form-group">
                            <label>Стоимость</label>
                            <input type="email" class="form-control modal-create-price" placeholder="Стоимость">
                        </div>
                        <div class="form-group">
                            <label>Код</label>
                            <input type="email" class="form-control modal-create-code" placeholder="Код">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success create-button" data-dismiss="modal">Редактировать</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    </div>
                </div>
            </div>
        </div>
        <!--    Модалка редактирования-->

        <div class="container">
            <div class="row mt-5">
                <div class="form-inline col-md-8">
                    <div class="input-group mb-3 w-100">
                        <input type="text" id="search" class="form-control" placeholder="Введите для сортировки" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <select class="form-control" id="filterSelect">
                        <option value="name">Фильтровать по названию</option>
                        <option value="artist">Фильтровать по артисту</option>
                        <option value="year">Фильтровать по году выпуска</option>
                        <option value="duration">Фильтровать по длительности</option>
                        <option value="date">Фильтровать по дате покупки</option>
                        <option value="price">Фильтровать по стоимости</option>
                        <option value="code">Фильтровать по коду</option>
                    </select>
                </div>
            </div>
            <hr class="pt-0 mt-0">
            <div class="row">
                <div class="form-group col-md-4">
                    <select class="form-control" id="sortSelect">
                        <option value="name">Сортировать по названию</option>
                        <option value="artist">Сортировать по артисту</option>
                        <option value="year">Сортировать по году выпуска</option>
                        <option value="duration">Сортировать по длительности</option>
                        <option value="date">Сортировать по дате покупки</option>
                        <option value="price">Сортировать по стоимости</option>
                        <option value="code">Сортировать по коду</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select class="form-control" id="orderSelect">
                        <option value="1">Сортировать по возрастанию</option>
                        <option value="0">Сортировать по убыванию</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <form class="form-inline">
                        <div class="input-group mb-3 w-100">
                            <button id="btnSort" class="btn btn-outline-secondary w-100" type="button">Сортировать</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-5" id="cards">
                <?php foreach ($data as $row): ?>
                    <div class="col-md-4 mb-3 item" id="card-id-<?= $row['id'] ?>">
                        <div class="card">
                            <img class="card-img-top" src="<?= $row['cover'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title name"><?= $row['title_album'] ?></h5>
                                Название артиста:<p class="card-text artist"> <?= $row['title_artist'] ?></p>
                                Год выпуска:<p class="card-text year"> <?= $row['release'] ?></p>
                                Длительность:<p class="card-text duration"> <?= $row['duration'] ?> мин</p>
                                Дата покупки:<p class="card-text date"> <?= $row['buy'] ?></p>
                                Стоимость:<p class="card-text price"> <?= $row['cost'] ?> $</p>
                                Код хранилища:<p class="card-text code"> <?= $row['storage_code'] ?></p>
                                <button type="button" class="btn btn-danger delete" data-id="<?= $row['id'] ?>">Удалить</button>
                                <button type="button" class="btn btn-warning edit" data-id="<?= $row['id'] ?>">Изменить</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success create w-100" data-id="-1">Создать</button>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $('document').ready(function() {
                let values = ['name', 'artist', 'year', 'duration', 'date', 'price', 'code'];
                jQuery.expr[':'].contains = function(a, i, m) {
                    return jQuery(a).text().toUpperCase()
                        .indexOf(m[3].toUpperCase()) >= 0;
                };

                $('#search').keyup(function (){
                    filterBy();
                })

                $("#filterSelect").change(function() {
                    filterBy();
                });

                $('#btnSort').click(function (){
                    let sortField = $('#sortSelect').val();
                    let orderBy = $('#orderSelect').val();
                    console.log(sortField)
                    $('#cards .item').sort(function(a,b) {
                        if(orderBy == 1) {
                            return $(a).find("." + sortField).text() > $(b).find("." + sortField).text() ? 1 : -1;
                        } else {
                            return $(a).find("." + sortField).text() < $(b).find("." + sortField).text() ? 1 : -1;
                        }
                    }).appendTo("#cards");
                })
            });

            function filterBy(){
                $('.item').removeClass('d-none');
                let field = $('#filterSelect').val();
                var filter = $('#search').val(); // get the value of the input, which we filter on
                $('#cards').find('.card .card-body .'+field+':not(:contains("'+filter+'"))').parent().parent().parent().addClass('d-none');
            }

            $('body').on('click', '.delete', function() {
                $('.delete-button').attr('data-delete-confirmed', $(this).attr("data-id"));
                $('#deleteModal').modal('show');
            });

            $('body').on('click', '.edit', function() {
                $('.modal-create-title').text('Редактировать карточку');
                $('.create-button').text('Редактировать');
                let id = $(this).attr("data-id");
                let element = $('#card-id-'+id);
                $('.modal-create-image').val(element.find('.card-img-top').attr('src'));
                $('.modal-create-name').val(element.find('.name').text());
                $('.modal-create-artist').val(element.find('.artist').text());
                $('.modal-create-year').val(element.find('.year').text());
                $('.modal-create-duration').val(element.find('.duration').text().replace(' мин', ''));
                $('.modal-create-date').val(element.find('.date').text());
                $('.modal-create-price').val(element.find('.price').text().replace(' $', ''));
                $('.modal-create-code').val(element.find('.code').text());
                $('.create-button').attr('data-create-id', $(this).attr("data-id"));
                $('#editModal').modal('show');
            });

            $('body').on('click', '.create', function() {
                $('.modal-create-title').text('Создать карточку');
                $('.create-button').text('Создать');
                let id = '-1';
                $('.modal-create-image').val('');
                $('.modal-create-name').val('');
                $('.modal-create-artist').val('');
                $('.modal-create-year').val('');
                $('.modal-create-duration').val('');
                $('.modal-create-date').val('');
                $('.modal-create-price').val('');
                $('.modal-create-code').val('');
                $('.create-button').attr('data-create-id', id);
                $('#editModal').modal('show');
            });

            $('body').on('click', '.create-button', function() {
                let id = $(this).attr("data-create-id");
              console.log(id);
                if(id != '-1') { //Редактирование элемена
                  $.post('/edit', {
                      id: id,
                      cover: $('.modal-create-image').val(),
                      title_album: $('.modal-create-name').val(),
                      title_artist: $('.modal-create-artist').val(),
                      release: $('.modal-create-year').val(),
                      duration: $('.modal-create-duration').val(),
                      cost: $('.modal-create-price').val(),
                      buy: $('.modal-create-date').val(),
                      storage_code: $('.modal-create-code').val(),
                    },
                    function(data){
                      let element = $('#card-id-' + id);
                      element.find('.card-img-top').attr('src', $('.modal-create-image').val());
                      element.find('.name').text($('.modal-create-name').val());
                      element.find('.artist').text($('.modal-create-artist').val());
                      element.find('.year').text($('.modal-create-year').val());
                      element.find('.duration').text($('.modal-create-duration').val() + ' мин');
                      element.find('.date').text($('.modal-create-date').val());
                      element.find('.price').text($('.modal-create-price').val() + ' $');
                      element.find('.code').text($('.modal-create-code').val());
                    }
                  );
                } else {
                    $.post('/create', {
                          cover: $('.modal-create-image').val(),
                          title_album: $('.modal-create-name').val(),
                          title_artist: $('.modal-create-artist').val(),
                          release: $('.modal-create-year').val(),
                          duration: $('.modal-create-duration').val(),
                          cost: $('.modal-create-price').val(),
                          buy: $('.modal-create-date').val(),
                          storage_code: $('.modal-create-code').val(),
                        },
                        function(data){
                          let idFromServer = JSON.parse(data).payload.id;
                          let html = $('#clear').html();
                          $('#cards').append(html);
                          let newCard = $('.card-id-created').eq(1);
                          console.log(newCard);
                          newCard.find('.card-img-top').attr('src', $('.modal-create-image').val())
                          newCard.find('.name').text($('.modal-create-name').val());
                          newCard.find('.artist').text($('.modal-create-artist').val());
                          newCard.find('.year').text($('.modal-create-year').val());
                          newCard.find('.duration').text($('.modal-create-duration').val());
                          newCard.find('.date').text($('.modal-create-date').val());
                          newCard.find('.price').text($('.modal-create-price').val());
                          newCard.find('.code').text($('.modal-create-code').val());
                          newCard.attr('id', 'card-id-'+idFromServer);
                          newCard.find('.delete').attr('data-id', idFromServer);
                          newCard.find('.edit').attr('data-id', idFromServer);
                          newCard.removeClass('card-id-created');
                        }
                    );
                    $('#createModal').modal('hide');
                }
            });

            $('body').on('click', '.delete-button', function() {
              let id = $(this).attr("data-delete-confirmed");
              $.post('/remove', {
                  id: id
                },
                function(data){
                  $("#card-id-"+id).remove();
                  $('#deleteModal').modal('hide');
                }
              );
            });
        </script>
    </body>
</html>