<?php

require_once '../src/Services/TaskManager.php';
require_once '../src/Entities/Task.php';

use Entities\Task;
use Services\TaskManager;

$manager = new TaskManager();

$task1 = new Task(1, 'Написать отчет', 'Подготовить отчет к понедельнику', '2025-08-01');
$task2 = new Task(2, 'Созвон с клиентом', 'Обсудить условия контракта', '2025-07-30');
$task3 = new Task(3, 'Созвон с клиентом 2', 'Обсудить условия контракта', '2025-07-30');

$manager->add($task1);
$manager->add($task2);
$manager->add($task3);

// -------------------------------------------------------------------------------------
echo '<h2>Все задачи</h2><pre>';
foreach ($manager->getAll() as $task) {
    print_r($task->toArray());
}
echo '</pre>';

// -------------------------------------------------------------------------------------
echo '<h2>Выполнил первую задачу</h2><pre>';
$task1->markAsCompleted();
foreach ($manager->getAll() as $task) {
    print_r($task->toArray());
}
echo '</pre>';


// -------------------------------------------------------------------------------------
echo '<h2>Выполненные задачи</h2><pre>';
foreach ($manager->getCompleted() as $task) {
    print_r($task->toArray());
}
echo '</pre>';


// -------------------------------------------------------------------------------------
echo '<h2>Не выполненные задачи</h2><pre>';
foreach ($manager->getPending() as $task) {
    print_r($task->toArray());
}
echo '</pre>';


// -------------------------------------------------------------------------------------
echo '<h2>Удалил первую задачу</h2><pre>';
$manager->remove($task1->getId());
foreach ($manager->getAll() as $task) {
    print_r($task->toArray());
}
echo '</pre>';