<?php
    class Components
    {
        public function success($kind, $string)
        {
            return "<div id='success'>" .
                "<p onclick='close1()' id='close'>x</p>"
                . $kind . "  " . $string
                . "</div>";
        }

        public function error($kind, $string)
        {
            return "<div id='error'>" .
                "<p  onclick='close2()' id='close'>x</p>"
                . $kind . "  " . $string
                . "</div>";
        }

        public function empty_error()
        {
            return "<div id='error'>" .
                "<p onclick='close2()' id='close'>x</p>" .
                "Please Check That Your Wrote anything inside Topic "
                . "</div>";
        }


    }

