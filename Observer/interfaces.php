<?php
interface Subject {
    public function registerObserver($Observer);
    public function removeObserver($Observer);
    public function notifyObservers();
}

interface Observer {
    public function update();
}

interface DisplayElement {
    public function display();
}