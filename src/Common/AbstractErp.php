<?php

namespace Sylapi\Erp\Common;

/**
 * Class AbstractErp.
 */
abstract class AbstractErp
{
    /**
     * @var
     */
    protected $erp;
    /**
     * @var
     */
    protected $response;
    /**
     * @var array
     */
    protected $errors;
    /**
     * @var array
     */
    protected $params = [];

    /**
     * @param bool $sandobx
     */
    public function sandbox(bool $sandobx)
    {
        $this->params['sandbox'] = $sandobx;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login)
    {
        $this->params['accessData']['login'] = $login;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->params['accessData']['password'] = $password;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->params['accessData']['key'] = $key;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->params['accessData']['token'] = $token;
    }

    /**
     * @param array $auth
     */
    public function setAuth(array $auth = [])
    {
        $this->params['accessData']['auth'] = $auth;
    }

    /**
     * @return string
     */
    public function getErpName()
    {
        return $this->erp;
    }

    /**
     * @return mixed
     */
    public function getParameter(array $keys = [])
    {
        $value = $this->params;
        foreach ($keys as $key) {
            if (isset($value[$key])) {
                $value = $value[$key];
            } else {
                return null;
            }
        }

        return $value;
    }

    /**
     * @return mixed
     */
    public function setResponse($data)
    {
        return $this->response = $data;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->errors;
    }

    /**
     * @param array $data
     */
    protected function setError(array $data = [])
    {
        $this->errors = $data;
    }

    public function debug()
    {
        return [
            'error'    => $this->getError(),
            'response' => $this->getResponse(),
        ];
    }

    /**
     * @param $class
     * @param array $parameters
     *
     * @return mixed
     */
    protected function createRequest($class, array $parameters = [])
    {
        $obj = new $class();

        if (!empty($this->params)) {
            foreach ($this->params as $key => $value) {
                if (!empty($value)) {
                    $parameters[$key] = $value;
                }
            }
        }

        $obj->setErpName($this->erp);
        $obj->initialize($parameters);
        $obj->sendData();

        return $obj;
    }
}
