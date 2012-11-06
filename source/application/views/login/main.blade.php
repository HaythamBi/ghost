<?php

echo Form::open('login/do', 'POST', array('class' => 'form-inline'));

echo Form::token();

echo Form::text('email', Input::get('email'), array('placeholder' => 'Email'));

echo Form::password('password', array('placeholder' => 'Password'));

echo Form::submit('Submit', array('class' => 'btn'));

echo Form::close();
