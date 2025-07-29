<?php

namespace Services;

use Entities\Task;

class TaskManager
{

    private array $tasks = [];

    public function add(Task $task): void{
        $this->tasks[] = $task;
    }

    public function remove(int $taskId): void
    {
        foreach ($this->tasks as $key => $task) {
            if ($task->getId() === $taskId) {
                unset($this->tasks[$key]);
            }
        }

        $this->tasks = array_values($this->tasks);
    }

    public function getAll(): array{
        return $this->tasks;
    }

    public function getCompleted(): array{
        return array_filter($this->tasks, fn(Task $task) => $task->isCompleted());
    }

    public function getPending(): array{
        return array_filter($this->tasks, fn(Task $task) => !$task->isCompleted());
    }
}



