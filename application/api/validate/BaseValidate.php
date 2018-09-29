<?php
/**
 * 验证器基类
*/
namespace app\api\validate;

use think\Validate;
use think\Request;
use think\Exception;
use app\lib\exception\ParameterException;

class BaseValidate extends Validate
{
    public function gocheck () {
        
        //验证http传入的参数
        $request = Request::instance();
        $params = $request->param();

        $result = $this->check($params);

        if (!$result) {
            $e = new ParameterException([
                'msg' => $this->error
            ]);
            // $e->msg = $this->error;
            throw $e;
            // $error = $this->error;
            // throw new Exception($error);
        }else {
            return true;
        }

    }
}
