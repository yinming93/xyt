/**
 * @author purelite.zhu <purelite.zhu@gmail.com>
 * @createTime 2014年12月4日上午9:26:04
 * @filename MenuView.js
 */
//
var menuViewLayer;
var gameView;
var gameViewBackground;

var MenuView = cc.Layer.extend
(
	{
		ctor: function()
		{
			this._super();
			var size = cc.director.getWinSize();
			
			var StartBtn= new cc.MenuItemSprite(
					new cc.Sprite(res.Btnn_png), // normal state image
					new cc.Sprite(res.Btns_png), //select state image
					this.onPlay, this);
			var Btn = new cc.Menu(StartBtn);  //7. create the menu
			Btn.setPosition(size.width/2,size.height/2);
			this.addChild(Btn);
			return true;
		},
		onPlay:function(){
			this.removeFromParent(true);
			gameViewBackground.scoreBg();
			gameViewBackground.drawGuidtext();
			gameView.startGame();
		}
	}
);

var MenuViewScene = cc.Scene.extend
(
	{
		onEnter:function ()
		{
			this._super();
			gameViewBackground = new GameViewBackground();
			this.addChild(gameViewBackground, -1, 0);

			gameView = new GameView();
			this.addChild(gameView, -1, 0);

			menuViewLayer = new MenuView();
			this.addChild(menuViewLayer);		
		}
	}
);
