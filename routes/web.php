<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact-form'); // URL при нажатии на кнопку отправки и перенапрвляет на главную. В form указан этот name

Route::get('/contact/all', [ContactController::class, 'allData'])->name('contact-data'); // URL для перехода стр 'Сообщения', в котором будут показаны все сообщения из бд.

Route::get('/contact/all/{id}', [ContactController::class, 'showOneMessage'])->name('contact-data-one');// URL для перехода к одному из всех сообщений

Route::get('/contact/all/{id}/update', [ContactController::class, 'updateMessage'])->name('contact-update');//URL для перехода к стр обновления выбранного сообщения, где оно будет ввиде форм

Route::post('/contact/all/{id}/update', [ContactController::class, 'updateMessageSubmit'])->name('contact-update-submit');//Url при нажатии на кнопку отправки, где она обнавляет и перенаправляет к странице только с этой записью


Route::get('/contact/all/{id}/delete', [ContactController::class, 'deleteMessage'])->name('contact-delete');//Url при нажатии на кнопку удаления записи(кнопка она находиться возле кнопки Редактирования на странице Одной записи), которая удаляет данную запись и преренаправляет


