<?php
interface crud {
    public function create(array $data);
    public function read(array $data);
    public function update(array $data);
    public function delete(array $data);
}