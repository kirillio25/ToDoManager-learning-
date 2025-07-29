<?php

namespace Entities;

require_once __DIR__ . '/../Services/TaskManager.php';

class Task
{
    private $id;
    private $title;
    private $description;
    private $deadline;
    private $isCompleted = false;

    public function __construct($id, $title, $description, $deadline){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->deadline = $deadline;
    }

    public function getId(){
        return $this->id;
    }

    public function markAsCompleted(){
        $this->isCompleted = true;
    }

    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'deadline' => $this->deadline,
            'completed' => $this->isCompleted
        ];
    }
}