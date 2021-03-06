<?php
/**
 * User: Wisp X
 * Date: 2018/9/27
 * Time: 上午10:14
 * Link: https://github.com/wisp-x
 */

namespace app\index\controller\admin;

use app\index\controller\Base as AdminBase;

class Base extends AdminBase
{
    protected function initialize()
    {
        parent::initialize();
        if (!$this->user) {
            $this->redirect(url('auth/login'));
        }
        if (!$this->user->is_admin) {
            $this->redirect(url('/'));
        }
    }

    protected function getConfigs($keys)
    {
        $configs = [];
        foreach ($this->configs as &$value) {
            if (in_array($value->key, $keys)) {
                $configs[$value->key][] = $value;
            }
        }
        return $configs;
    }
}
