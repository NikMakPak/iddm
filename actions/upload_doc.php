<?php
if (($_SERVER['REQUEST_METHOD'] === 'POST') and (!empty($_POST)) and (!empty($_GET['id'])) and (empty($_GET['id_doc']))){
    $form_doc_arr=[
        'id_patient'=> $_GET['id'],
        'title'=>$_POST['title'],
        'type'=>$_POST['type'],
        'applied'=> (empty($_POST['applied'])) ? 'не приложено' : $_POST['applied'],
        'content'=>$_POST['content'],
        'for_spec_name'=>$_POST['for_spec_name']
    ];
    insert('docs',$form_doc_arr);
}
if (($_SERVER['REQUEST_METHOD'] === 'POST') and (!empty($_POST)) and (!empty($_GET['id_doc']))){
    $form_doc_arr=[
        'id_patient'=> $_GET['id'],
        'title'=>$_POST['title'],
        'type'=>$_POST['type'],
        'applied'=> (empty($_POST['applied'])) ? 'не приложено' : $_POST['applied'],
        'content'=>$_POST['content'],
        'for_spec_name'=>$_POST['for_spec_name']
    ];
    update('docs','id_doc',$_GET['id_doc'],$form_doc_arr);
}