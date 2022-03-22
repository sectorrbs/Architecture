<?php

    abstract class Command
    {
        protected $editor;

        public function __construct(TextEditor $editor)
        {
            $this->editor = $editor;
        }

        public function saveBackup()
        {
            #Сохранение состояния редактора
        }

        abstract public function execute();
    }


    class CopyCommand extends Command
    {
        public function execute()
        {
            #Логика копирования
        }
    }

    class CutCommand extends Command
    {
        public function execute()
        {
            #Логика вырезания
        }
    }

    class PasteCommand extends Command
    {
        public function execute()
        {
            #Логика вставки
        }
    }

    class UndoCommand extends Command
    {
        public function execute()
        {
            #Логика возврата
        }
    }

    class CancelCommand extends Command
    {
        public function execute()
        {
            #Логика отмены
        }
    }


    #Получатель
    class TextEditor
    {
        protected $text;

        public function getSelection()
        {
            #Вернуть выбранный текст
        }

        public function deleteSelection()
        {
            #Удалить выбранный текст
        }

        public function replaceSelection($text)
        {
            #Вставить текст из буфера обмена в текущей позиции
        }

        #прочая логика
    }

    #Отправитель
    class Application
    {
        protected $editor;

        public function __construct(TextEditor $editor)
        {
            $this->editor = $editor;
        }

        public function copy()
        {
            return new CopyCommand($this->editor);
        }

        public function cut()
        {
            return new CutCommand($this->editor);
        }

        public function paste()
        {
            return new PasteCommand($this->editor);
        }

        public function undo()
        {
            return new UndoCommand($this->editor);
        }

        public function cancel()
        {
            return new CancelCommand($this->editor);
        }
    }


    $app = new Application(new TextEditor);
    $app->cut();
    $app->paste();
