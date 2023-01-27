<?php 
    class FlashMsg {
        public static function setFlash($message, $action, $type, $cause='') {
            $_SESSION["flash"] = [
                "msg" => $message,
                "action" => $action,
                "type" => $type,
                "cause" => $cause
            ];
        }

        public static function flashMessage() {
            if (isset($_SESSION["flash"])) {
                if ($_SESSION["flash"]["type"] === 'success') {
                    echo '<div class="alert alert-' . $_SESSION["flash"]["type"] . ' alert-dismissible fade show" role="alert">
                            Product <strong>' . $_SESSION["flash"]["msg"] . '</strong> ' . $_SESSION["flash"]["action"] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                } else {
                    echo '<div class="alert alert-' . $_SESSION["flash"]["type"] . ' alert-dismissible fade show" role="alert">
                            Product <strong>' . $_SESSION["flash"]["msg"] . '</strong> ' . $_SESSION["flash"]["action"] . 
                            '<br>Cause : ' . $_SESSION["flash"]["cause"] . 
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }

                unset($_SESSION["flash"]);
            }
        }
    }
?>