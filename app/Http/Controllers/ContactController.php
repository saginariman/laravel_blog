<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\ContactModel;
class ContactController extends Controller
{

	//функция для добавления сообщений на бд, при нажатии на кнопку формы на странице Контакт(feedback)
    public function submit(ContactRequest $req) {
    	/*$validation = $req->validate([
    		'subject' => 'required|min:5|max:50',
    		'message' => 'required|min:15|max:500',
    		'email' => 'required|min:5|max:50'
    	]);*/

    	$contact = new ContactModel();
    	$contact->name = $req->input('name');
    	$contact->email = $req->input('email');
    	$contact->subject = $req->input('subject');
    	$contact->message = $req->input('message');

    	$contact->save();
    	return redirect()->route('home')->with('success', 'Сообщение было добавлено!');
    }

    //Функция при переходе на страницу 'Сообщения', где выдаются все записи из бд
    public function allData() {
    	$contact = new ContactModel();
    	return view('messages', ['data' => $contact->all()]);
    }

    //Функция показа только одной записи и его содержимого, при нажатии кнопки 'Детальнее'
    public function showOneMessage($id) {
    	$contact = new ContactModel();
    	return view('one-message', ['data' => $contact->find($id)]);
    }

    //Функция при нажатии на кнопку 'Редактировать', которая передает обьект записи на страницу обновления(формой и кнопкой)
    public function updateMessage($id){
    	$contact = new ContactModel();
    	return view('update-message', ['data' => $contact->find($id)]);
    	
    }

    //Функция при нажатии 'Обновить' на странице Редактироования(формой и кнопкой), которая обновляет данные одной записи в бд и перенаправляет на Страницу данной записи(сообщение)
    public function updateMessageSubmit($id, ContactRequest $req) {
    	$contact = ContactModel::find($id);
    	$contact->name = $req->input('name');
    	$contact->email = $req->input('email');
    	$contact->subject = $req->input('subject');
    	$contact->message = $req->input('message');

    	$contact->save();
    	return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено!');
    }

//Функция при нажатии 'Удалить' на странице Редактироования(формой и кнопкой), которая удаляет данные этой записи из бд и перенаправляет на Страницу 'Все Сообщения'
    public function deleteMessage($id){
    	ContactModel::find($id)->delete();
    	    	return redirect()->route('contact-data')->with('success', 'Сообщение было удалено!');//передает секцию

    }

}
