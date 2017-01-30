<?php

/**
 * This php file is automatically generated by Skolenet
 * Model - Class: member_message
 */

if (0 > version_compare(PHP_VERSION, '5'))
{ die('This file was generated for PHP 5'); }


require_once('class.basic_list.php');


class generated_member_message_list
     extends basic_list
{

    /**
     *
     * This attribute hold the handle to the Mysqli statement member_message
     * @author Bernd Schr�der
     *
     * @access protected
     * @var Integer
     */
    protected $stmt = null;
    

    /**
     *
     * This is the list_load function of the class member_message
     * @author Bernd Schr�der
     *
     */
    public function list_load( $where_statement )
    {
      $prepare_statement = 
      "SELECT
      id,
      author_id,
      written_stamp,
      reader_id,
      read_stamp,
      text
      FROM member_message " .
      $where_statement;
      return $this->basic_load( $prepare_statement );
    }

    /**
     *
     * This is the basic_count function of the class member_message
     * @author Bernd Schr�der
     *
     */
    public function basic_count( $prepare_statement )
    {
      require "data_connect.php";

      $object_number = 0;
      if( $this->stmt = $mysqli->prepare( $prepare_statement ))
      {
      $this->set_binding();
      $this->stmt->execute();
      $this->stmt->store_result();
      $object_number = $this->stmt->num_rows;
      $this->stmt->close();
      }
      $mysqli->close();
      return $object_number;
    }

    /**
     *
     * This is the basic_load function of the class member_message
     * @author Bernd Schr�der
     *
     */
    public function basic_load( $prepare_statement )
    {
      if( defined('__GEN_ROOT__') == FALSE )
      { define('__GEN_ROOT__', dirname(dirname(__FILE__))); }
      require_once(__GEN_ROOT__.'/class.member_message.php');

      require "data_connect.php";

      $object_number = 0;
      $max_row = $this->get_row_per_page();
      $page = $this->get_page();
      $start_row = $page*$max_row;
      if( $this->stmt = $mysqli->prepare( $prepare_statement ))
      {
      $this->set_binding();
      $this->stmt->execute();
      $this->stmt->bind_result
      (
      $id,
      $author_id,
      $written_stamp,
      $reader_id,
      $read_stamp,
      $text
      );
      $this->stmt->store_result();
      $this->stmt->data_seek( (int)( $start_row ) );
      while( $this->stmt->fetch()  
      AND ( $object_number < $max_row ) )
      {
      $new_object = new member_message();
      $new_object->set_id( $id );
      $new_object->set_author_id( $author_id );
      $new_object->set_written_stamp( $written_stamp );
      $new_object->set_reader_id( $reader_id );
      $new_object->set_read_stamp( $read_stamp );
      $new_object->set_text( $text );
      $this->add_item( $new_object );
      $object_number++;
      }
      $this->stmt->close();
      }
      $mysqli->close();
      return $object_number;
    }

    /**
     *
     * This is the prepare_list function of the class member_message
     * @author Bernd Schr�der
     *
     */
    public function get_prepare_list()
    {
      return 
      "
      member_message.id,
      member_message.author_id,
      member_message.written_stamp,
      member_message.reader_id,
      member_message.read_stamp,
      member_message.text
      ";
    }

    /**
     *
     * This is the set_binding function of the class member_message
     * @author Bernd Schr�der
     *
     */
    public function set_binding()
    {
      ;
    }

} /* end of class member_message */
?>