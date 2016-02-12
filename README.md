# eventbrite-plugin

##Installation
From your October CMS installation:

```
cd plugins
git clone git@github.com:samhoud/eventbrite-plugin.git samhoud
cd samhoud/eventbrite
composer install
```

##Configuration
Open your October CMS backend. Go to the "Settings" page.
Under "Misc", choose "&samhoud Eventbrite API"
Fill out your API Token

##Usage

### Event series API
Get all event series owned by authorized user

1. Create/Select page
2. Add component: Event Series API
3. In your page include 
```{% component 'EventSeriesAPI' %}```

### Event Serie API
Get events for given serie

1. Create/Select page
2. Add component: Event Serie API
3. Use as URL: /serie/:serieID (or change url's in component code) 
4. In your page include 
```{% component 'EventSerieAPI' %}```

####optional:
To use the title of the event/serie name, add to serie.htm in de twig settings:
```
[EventSerieAPI]
eventTitle = ''
```
Now you can use the title everywhere in the page with:
``` {{eventTitle}} ```

### Event API
Get event info
1. Create/Select page
2. Add component: Event API
3. Use as URL: /event/:eventID (or change url's in plugin components code) 
4. In your page include 
```{% component 'EventAPI' %}```

####optional:
To use the title of the event/serie name, add to serie.htm in de twig settings:
```
[EventAPI]
eventTitle = ''
```
Now you can use the title everywhere in the page with:
``` {{eventTitle}} ```

### Buyframe API
Display eventbrite ticket form iFrame

1. Create/Select page
2. Add component: BuyFrame Component
3. In your page include 
``` {% component 'BuyFrame' %} ```

On a serie or event page, it will automatically get the corresponding iFrame.
If you want to use te BuyFrame on a different page, click on the Buyframe Component and insert the event id.

