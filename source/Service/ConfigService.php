<?php

namespace Source\Service;


class ConfigService 
{
  /** 
   * @return array
   */
  public static function get_styles(): array
  {
    return [
        "
        background:rgba(0,0,0,0.8);color:#48ff00;width:100%;height:auto;
        ", "
        color: #fff;padding: 50px 0 20px 50px;
        border-bottom: 3px solid grey;text-shadow: 5px 2px 50px #fff;
        ", 'true'
      ];
  }

  /** 
   * @param array[$info]
   * @param int[$flag]
   * 
   */
  public static function dd(array $info = [], int $flag = 0): array|null
  {
    if ((is_array($info) ? count($info) : strlen($info)) == 0) return [];
    
    print "<div style='" . self::get_styles()[0] . "'>
        <h1 style='" . self::get_styles()[1] . "'>Debug: True</h1>
      ";
    if (is_array($info))
      foreach ($info as $key => $value) {
        print '<pre>';
        if ($flag == 0)
          print_r($value);
        if ($flag == 1)
          var_dump($value);
        print '</pre>';
      }
    else print_r($info);
    print "</div>";
    die;
  }

  /**
   * @param array[$message]
   * @param array[$keys]
   * @return bool
   */
  public static function validate_message_controller(array $message, array $keys = []): bool
  {
    $message = $message[$keys[0]][$keys[1]];
    return isset($message) && strlen($message) != 0;
  }

  /**
   * @param array[$message]
   * @param array[$keys]
   * @return string
   */
  public static function str_text(array $message, array $keys): string
  {
    if (self::validate_message_controller($message, $keys)) {
      return "
            <div class='alert {$message[$keys[2]][$keys[3]]} mb-0' role='alert'>
                <h6 class='h6 text-muted ml-2'>
                {$message[$keys[0]][$keys[1]]}
                </h6>
            </div>";
    }
    return "";
  }

  /**
   * @param array[$message]
   * @return void
   */
  public static function show_message(array $message)
  {
    $dataset = [
      ['login', 'valido', 'classes', 'success'],
      ['login', 'invalido', 'classes', 'danger'],
      ['login', 'logout', 'classes', 'info']
    ];
    if (isset($message['login'])) {
      foreach ($dataset as $row) {
        if (self::validate_message_controller($message, $row)) {
          print self::str_text($message, $row);
        }
      }
    }

  } // end metod show_message

  
} // end class ConfigService()
