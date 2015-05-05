// ==UserScript==
// @name        Fluid Google Wave
// @namespace   http://fluidapp.com
// @description Wave and Fluid integration.
// @include     *
// @author      Guillermo Rauch <http://devthought.com>
// ==/UserScript==

(function(){
	if (window.fluid){

		// Provides a simple API to get Wave information
		FluidWave = {

			getUnreadCount: function(){
				var match = document.title.match(/\(([0-9]+)\)/);
				return match ? match[1] : 0;
			}

		};

		// Badge updating
		setInterval(function(){
			window.fluid.dockBadge = FluidWave.getUnreadCount() || null;
		}, 1000);

	}
})();