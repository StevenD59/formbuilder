<?php

class FormBuilder
{

    public function startForm($class = '', $action = '', $method = 'POST')
    {
        return '<Form class="'.$class.'" action="'.$action.'" method="'.$method.'">';
    }

    public function endForm()
    {
        return "</form>";
    }


    public function input($type = 'text', $value = '', $name = '', $class = 'form-control container', $placeholder = '', $id = '')
    {//Je crée ma fonction avec tout les paramètres necessaire (et non obligatoire grâce au valeurs par défault (='')

        return '<input type="'.$type.'" id="'.$id.'" name="'.$name.'" placeholder="'.$placeholder.'" value="'.$value.'" class="'.$class.'">';//exemple: avec les guillemets, remplace le $type par la valeur du paramètre $type.

    }

    public function label($textLabel, $for = '', $class = 'container')
    {

        return '<label for="'.$for.'" class="'.$class.'">'.$textLabel.'</label>';

    }


    public function inputMail($name, $value = '', $placeholder = '', $class = 'form-control container', $id = '')
    {

        return $this->input('email', $id, $name, $class, $placeholder, $value);

    }


    public function buttonSend($name, $value = 'Envoyer le formulaire', $type = 'submit', $class = 'offset-2 col-2 btn btn-primary')
    {

        return '<input type="'.$type.'" name="'.$name.'" class="'.$class.'" value="'.$value.'">';

    }

    public function select($name, $arrayOptions, $class='')//Il doit crée un tableau avec une clé => valeur
    {

        $selectHTML = "<select name='$name' array=''> class='$class'";
        foreach($arrayOptions as $key => $value){
        $selectHTML .= '<option value='.$key.'>'.$value.'</option>';
        }
        $selectHTML .= "</select>";

        return $selectHTML;

    }


    public function file($type='file', $name='', $id='', $accept=''){

        return '<input type="'.$type.'" name="'.$name.'" id="'.$id.'" accept="'.$accept.'">';

    }


}

?>