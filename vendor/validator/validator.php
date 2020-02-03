<?php



class Validator{

    private $value;//C'est la valeur ajouté par l'utilisateur.
    private $errors = [];//Errors en tableau car il peut y en avoir plusieurs
    private $name; //C'est le nom de l'input
    private $label;

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    public function isText(){
        if (!preg_match('/^[a-zA-Z]+$/', $this->getValue())){
           $this->errors[] = 'Il faut renseigner votre '.$this->getName();//On récupère le nom de mon input
        }

    }

    public function isEmail(){
        $regexEmail = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (!preg_match($regexEmail, $this->getValue())){
            $this->errors[] = $this->getName().'non valide';
        }

    }

    public function maxLength($max){

        if(strlen($this->getValue()) < $max){
            $this->errors[] = 'Le'.$this->getLabel().' doit faire minimum'.$max.' caractères';
        }

    }









}



