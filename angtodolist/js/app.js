 'use-strict'; 
 
// CHECK TO ADD ITEMS to THE TODO LIST and COUNT
 
 angular.module('todoApp', [])
  .controller('TodoListController', function() {
    var todoList = this;
    todoList.todos = [
      {text:'Buy new laptop for web app development', done:true},
      {text:'Learn a new javascript tool', done:false},
      {text:'Become a master web app developer', done:false}];

// CHECK TO ADD ITEMS to THE TODO LIST and COUNT
 
    todoList.addTodo = function() {
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todoText = ''
    };
    
// CHECK TO COUNT ITEMS ADDED to THE TODO LIST

    todoList.remaining = function() {
      var count = 0;
      angular.forEach(todoList.todos, function(todo) {
        count += todo.done ? 0 : 1;
      });
      return count;
    };
 
// CHECK TO ADD ITEMS to PUSH to THE TODO LIST for COUNT

    todoList.archive = function() {
      var oldTodos = todoList.todos;
      todoList.todos = [];
      angular.forEach(oldTodos, function(todo) {
        if (!todo.done) todoList.todos.push(todo);
      });
    };
  });
  
  
