package classes
{
    import flash.display.*;
    import flash.events.*;
    import flash.external.*;

    public class bannerTwoButtons extends MovieClip
    {
        public var bgmovie:MovieClip;
        var vButtonLinks:Array;
        var vButtonTargets:Array;
        var btn_displace:Number = 27;
        public var play_btn:ButtonPlay;
        public var learn_btn:ButtonLearn;

        public function bannerTwoButtons()
        {
            vButtonLinks = new Array();
            vButtonTargets = new Array();
            btn_displace = 27;
            learn_btn.addEventListener(MouseEvent.MOUSE_OVER, manageMouseOverLearn);
            learn_btn.addEventListener(MouseEvent.MOUSE_OUT, manageMouseOutLearn);
            learn_btn.addEventListener(MouseEvent.CLICK, manageMouseClickLearn);
            learn_btn.buttonMode = true;
            play_btn.addEventListener(MouseEvent.MOUSE_OVER, manageMouseOverPlay);
            play_btn.addEventListener(MouseEvent.MOUSE_OUT, manageMouseOutPlay);
            play_btn.addEventListener(MouseEvent.CLICK, manageMouseClickPlay);
            play_btn.buttonMode = true;
            return;
        }// end function

        public function manageMouseClickLearn(event:MouseEvent) : void
        {
            ExternalInterface.call("openLink", vButtonLinks[1], vButtonTargets[1]);
            return;
        }// end function

        public function manageMouseOverLearn(event:MouseEvent) : void
        {
            learn_btn.button.y = learn_btn.button.y - btn_displace;
            return;
        }// end function

        function manageMouseOutPlay(event:MouseEvent) : void
        {
            play_btn.button.y = play_btn.button.y + btn_displace;
            return;
        }// end function

        function manageMouseClickPlay(event:MouseEvent) : void
        {
            ExternalInterface.call("openLink", vButtonLinks[2], vButtonTargets[2]);
            return;
        }// end function

        public function moviePlay() : void
        {
            bgmovie.play();
            return;
        }// end function

        function manageMouseOverPlay(event:MouseEvent) : void
        {
            play_btn.button.y = play_btn.button.y - btn_displace;
            return;
        }// end function

        public function moviePause() : void
        {
            bgmovie.stop();
            return;
        }// end function

        public function defineLinks(param1:Array, param2:Array) : void
        {
            vButtonLinks = param1;
            vButtonTargets = param2;
            return;
        }// end function

        public function manageMouseOutLearn(event:MouseEvent) : void
        {
            learn_btn.button.y = learn_btn.button.y + btn_displace;
            return;
        }// end function

    }
}
