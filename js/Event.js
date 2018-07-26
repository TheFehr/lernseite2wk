(function() {
	"use strict";
	
	Array.MAP_STR_TO_INT = function(a) {
		return parseInt(a);
	};

	// "Orsum Ichnographiae Event" - prefix due to conflicting name conventions while using the name "Event"
	var OIEvent = function(element, id) {
		this.id = parseInt(id);
		this.content = element.content;
		this.title = element.title;
		this.place = element.ort;
		this.position = element.position;
		this.prevEventIds = element.prevEvent.map(Array.MAP_STR_TO_INT);
		this.date = new Date(element.date);
		this.media = element.media;
	};
	
	var eventControl = {
		events: []
	};
	
	eventControl.addEvent = function(event) {
		if (typeof event !== "object")
			return;
			
		eventControl.events[event.id] = event;
	};
	
	eventControl.getPrevEventsForEvent = function(event) {
		var ret = [];
		eventControl.events.forEach(function(ev, i) {
			if (event.prevEventIds.includes(ev.id)) {
				ret.push(ev);
			}
		});
		
		return ret;
	};

	window.eventControl = eventControl;
	window.OIEvent = OIEvent;
})();
