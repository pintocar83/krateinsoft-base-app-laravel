<?php

function feature_flag($id){
  return config("feature_flag.{$id}");
}

?>