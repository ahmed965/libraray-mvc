<?php 
require_once 'Database.php';
  
class BookManager extends Database {
  public function getBooks() {
   $sql = 'SELECT * FROM book';
   $query = $this->getConnection()->prepare($sql);
   $query->execute();
   return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addBookDb($title, $number_pages, $topic) {
    $sql = 'INSERT INTO book (title, number_pages, topic) VALUES (:title, :number_pages, :topic)';
    $query = $this->getConnection()->prepare($sql);
    $query->bindValue(':title',$title, PDO::PARAM_STR);
    $query->bindValue(':number_pages',$number_pages, PDO::PARAM_INT);
    $query->bindValue(':topic', $topic, PDO::PARAM_STR);
    $query->execute();
  }

  public function getBookById($id) {
    $sql = 'SELECT * FROM  book WHERE id = :id';
    $query = $this->getConnection()->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function editBookDb($id, $title, $number_pages, $topic) {
    $sql = 'UPDATE book SET 
            title = :title, 
            number_pages = :number_pages,
            topic = :topic
            WHERE id = :id'; 
     $query = $this->getConnection()->prepare($sql);
     $query->bindValue(':id',$id, PDO::PARAM_INT);
     $query->bindValue(':title',$title, PDO::PARAM_STR);
     $query->bindValue(':number_pages',$number_pages, PDO::PARAM_INT);
     $query->bindValue(':topic', $topic, PDO::PARAM_STR);
     $query->execute();
  }

  public function removeBookDb($id) {
    $sql = 'DELETE FROM book WHERE id = :id';
    $query = $this->getConnection()->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
  }
 }
