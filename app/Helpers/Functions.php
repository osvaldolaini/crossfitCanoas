<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Functions
{
    /*Custom */
    public static function score($plus, $down, $data, $status)
    {
        if ($status == '1') {
            if (date("Y-m-d") > $data) {
                if ($plus == $down) {
                    $score =  '<span class="badge badge-warning">Empate ' . $plus . ' X ' . $down . '</span>';
                } elseif ($plus > $down) {
                    $score =  '<span class="badge badge-success">Vitória ' . $plus . ' X ' . $down . '</span>';
                } else {
                    $score =  '<span class="badge badge-danger">Derrota ' . $plus . ' X ' . $down . '</span>';
                }
            } else {
                $score = '<span class="badge badge-secondary">Agendado</span>';
            }
        } else {
            $score = '<span class="badge badge-secondary">Cancelado</span>';
        }
        return $score;
    }
    public static function positions($string)
    {
        switch ($string) {
            case "0":
                $position = 'Goleiro';
                break;
            case "1":
                $position = 'Zagueiro';
                break;
            case "2":
                $position = 'Lateral Direito';
                break;
            case "3":
                $position = 'Lateral Esquerdo';
                break;
            case "4":
                $position = 'Volante';
                break;
            case "5":
                $position = 'Volante / Meia';
                break;
            case "6":
                $position = 'Meia';
                break;
            case "7":
                $position = 'Meia / Atacante';
                break;
            case "8":
                $position = 'Atacante';
                break;
            case "":
                $position = 'Não informado';
                break;
        }
        return $position;
    }
    /*Thumbnail */
    public static function thumbnail($tmp, $path, $size, $tiny = null)
    {

        Storage::delete(['public/tmp/thumbnail.jpg']);
        /*IMAGE Thumbnail */
        // open file a image resource
        $img = Image::make($tmp);
        // resize the image to a height of 300 and constrain aspect ratio (auto width)
        $img->resize(null, $size, function ($constraint) {
            $constraint->aspectRatio();
        });
        // crop image
        $img->crop($size, $size, null, null);
        // save the image jpg format defined by third parameter
        $img->save($path . '/thumbnail.jpg', 100);

        // salvar em webp
        /*$webp = Image::make($path.'/thumbnail.jpg')->encode('webp', 100);
        $webp->save($path.'/thumbnail.webp', 100);*/

        if ($tiny != null) {
            // open file a image resource
            $mini = Image::make($path . '/thumbnail.jpg');
            // resize the image to a height of 300 and constrain aspect ratio (auto width)
            $mini->resize(null, 99, function ($constraint) {
                $constraint->aspectRatio();
            });
            // save the image jpg format defined by third parameter
            $mini->save($path . '/mini_thumbnail.jpg', 100);
        }
    }

    /*uploads */
    public static function uploadImage($tmp, $path, $thumb, $height, $width, $tiny = false)
    {
        Storage::delete(['public/tmp/thumbnail.jpg']);
        // open file a image resource
        $img = Image::make($tmp);
        /*IMAGE Thumbnail */
        $img->save($path . '/thumbnail.jpg', 100);
        // resize the image to a height of 300 and constrain aspect ratio (auto width)
        $img->resize(null, $width, function ($constraint) {
            $constraint->aspectRatio();
        });
        // crop image
        $img->crop($height, $width, null, null);
        // save the image jpg format defined by third parameter
        $img->save($path . '/' . $thumb . '.jpg', 100);

        // salvar em webp
        /*$webp = Image::make($path.'/thumbnail.jpg')->encode('webp', 100);
        $webp->save($path.'/thumbnail.webp', 100);*/

        if ($tiny != null) {
            // open file a image resource
            $mini = Image::make($path . '/thumbnail.jpg');
            // resize the image to a height of 300 and constrain aspect ratio (auto width)
            $mini->resize(null, 99, function ($constraint) {
                $constraint->aspectRatio();
            });
            // save the image jpg format defined by third parameter
            $mini->save($path . '/mini_thumbnail.jpg', 100);
        }
    }
    public static function uploadPlayers($tmp, $path, $height, $width, $tiny = false)
    {
        // open file a image resource
        $img = Image::make($tmp);
        $img->resize($height, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        // crop image
        //$img->crop($height, $width, null, null);

        // save the image jpg format defined by third parameter
        $img->save($path . '/player.png', 100);
        if ($tiny != null) {
            // open file a image resource
            $mini = Image::make($path . '/player.png');
            // resize the image to a height of 300 and constrain aspect ratio (auto width)
            $mini->resize(90, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // save the image jpg format defined by third parameter
            $mini->save($path . '/mini_thumbnail.png', 100);
        }
    }


    public static function month(string $string)
    {
        switch ($string) {
            case "01":
                $mes = 'Janeiro';
                break;
            case "02":
                $mes = 'Fevereiro';
                break;
            case "03":
                $mes = 'Março';
                break;
            case "04":
                $mes = 'Abril';
                break;
            case "05":
                $mes = 'Maio';
                break;
            case "06":
                $mes = 'Junho';
                break;
            case "07":
                $mes = 'Julho';
                break;
            case "08":
                $mes = 'Agosto';
                break;
            case "09":
                $mes = 'Setembro';
                break;
            case "10":
                $mes = 'Outubro';
                break;
            case "11":
                $mes = 'Novembro';
                break;
            case "12":
                $mes = 'Dezembro';
                break;
        }
        return $mes;
    }

    public static function status(string $string)
    {
        switch ($string) {
            case 0:
                $active = '<div class="btn btn-xs btn-danger text-white mx-1" style="cursor:default"><i class="fas fa-lg fa-thumbs-down "></i></div>';
                break;
            case 1:
                $active = '<div class="btn btn-xs btn-success text-white mx-1" style="cursor:default"><i class="fas fa-lg fa-thumbs-up"></i></div>';
                break;
            case 2:
                $active = '<div class="btn btn-xs btn-warning text-white mx-1 " style="cursor:default"><i class="fas fa-lg fa-book-dead"></i></div>';
                break;
            case 3:
                $active = '<div class="btn btn-xs btn-warning text-white mx-1 " style="cursor:default"><i class="fas fa-lg fa-exclamation-triangle"></i></div>';
                break;

            default:
                $active = '<div class="btn btn-xs btn-danger text-white mx-1" style="cursor:default"><i class="fas fa-lg fa-thumbs-down "></i></div>';
                break;
        }
        return $active;
    }

    public static function buttons($id, $level = null, $location, $commitDel = false, $send = false)
    {
        $btnEdit = '<a href="' . url($location . '/' . $id . '/editar') . '" class="btn btn-xs btn-secondary text-white mx-1 shadow" data-trigger="hover" data-tooltip="tooltip" data-placement="top" title="Editar">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </a>';

        if ($level) {
            if (Auth::user()->group->level > 10) {
                $btnDelete = '';
            } else {
                if ($commitDel == false) {
                    $btnDelete = '<a href="#" data-id="' . $id . '" class="btn btn-xs btn-danger text-white mx-1 shadow delete" data-trigger="hover" data-tooltip="tooltip" data-placement="top" title="Apagar">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </a>';
                } else {
                    $btnDelete = '<a href="#" data-id="' . $id . '" class="btn btn-xs btn-danger text-white mx-1 shadow delete-commit" data-trigger="hover" data-tooltip="tooltip" data-placement="top" title="Apagar">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </a>';
                }
            }
        } else {
            $btnDelete = '<a href="#" data-id="' . $id . '" class="btn btn-xs btn-danger text-white mx-1 shadow delete" data-trigger="hover" data-tooltip="tooltip" data-placement="top" title="Apagar">
                <i class="fa fa-lg fa-fw fa-trash"></i>
            </a>';
        }

        $btnDetails = '<a data-id="' . $id . '" class="btn btn-xs btn-primary text-white mx-1 shadow viewModel" data-trigger="hover" data-tooltip="tooltip" data-placement="top" title="Ver">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>';

        if ($send != false) {
            $dt = explode('|', $send);
            $send = '<a data-table="' . $dt[0] . '" data-id="' . $dt[1] . '" class="btn btn-xs btn-primary text-white mx-1 shadow btn-send" data-trigger="hover" data-tooltip="tooltip" data-placement="top" title="Enviar">
                        <i class="fas fa-lg fa-fw fa-mail-bulk"></i>
                    </a>';
            return '<nobr>' . $btnEdit . $btnDelete . $btnDetails . $send . '</nobr>';
        } else {
            return '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>';
        }
    }
    public static function array_sort($array, $on, $order = SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }
    public static function  array_orderby()
    {
        $args = func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = array();
                foreach ($data as $key => $row)
                    $tmp[$key] = $row[$field];
                $args[$n] = $tmp;
            }
        }
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
    }
}
