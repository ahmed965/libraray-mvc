<?php
require_once 'Controller.php';
require_once 'model/BookManager.php';

class Book extends Controller {
    private $bookManager;

    public function __construct() {
      $this->bookManager = new BookManager;
    }
    
    public function showBooks() {
      $books = $this->bookManager->getBooks();
      $this->view('books.view', $books);
    }

    public function addBookValidation() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'title' => trim($_POST['title']),
          'number_pages' => trim($_POST['number_pages']),
          'topic' => trim($_POST['topic']),
          'error_title' => '',
          'error_number_pages' => '',
          'error_topic' => ''
        ];

        if(empty($data['title'])) {
          $data['error_title'] = "Enter a valid title";
        }
        if(empty($data['number_pages']) || !preg_match('/^\d+$/', $data['number_pages'])) {
          $data['error_number_pages'] = "Enter a valid page number";
        }
        if(empty($data['topic'])) {
          $data['error_topic'] = "Enter a valid topic";
        }
        if(empty($data['error_title']) && empty($data['error_number_pages']) && empty($data['error_topic'])) {
          $this->bookManager->addBookDb($data['title'], $data['number_pages'], $data['topic']);
          header('location:' . URL . 'books');
        } else {
          $this->view('addBook.view', $data);
        }
      } else {
        $data = [
          'title' => '',
           'number_pages' => '',
           'topic' => ''
        ];
        $this->view('addBook.view', $data);
      }
  }

  public function editBookValidation($id) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'id' => $_POST['id'],
          'title' => trim($_POST['title']),
          'number_pages' => trim($_POST['number_pages']),
          'topic' => trim($_POST['topic']),
          'error_title' => '',
          'error_number_pages' => '',
          'error_topic' => ''
        ];

      if(empty($data['title'])) {
        $data['error_title'] = "Enter a valid title";
      }
      if(empty($data['number_pages']) || !preg_match('/^\d+$/', $data['number_pages'])) {
        $data['error_number_pages'] = "Enter a valid page number";
      }
      if(empty($data['topic'])) {
        $data['error_topic'] = "Enter a valid topic";
      }
      if(empty($data['error_title']) && empty($data['error_number_pages']) && empty($data['error_topic'])) {
        $this->bookManager->editBookDb($data['id'], $data['title'], $data['number_pages'], $data['topic']);
        header('location:' . URL . 'books');
      } else {
        $this->view('editBook.view', $data);
      }
    } else {
      $book = $this->bookManager->getBookById($id);
      $this->view('editBook.view', $book);
    }
}

  public function removeBookValidation() {
    $this->bookManager->removeBookDb($_POST['id']);
    header('location:' . URL . 'books');
  }
}
