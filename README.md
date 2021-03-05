## FIFO Shopware 5 Events

I created this crap because:

- There's no documentation for events in shopware (as almost anything in shopware ... yay)

- Frosh profiler is: SLOW, buggy (the events part loaded forever I don't know if they fixed it and I don't care), adds things I DONT need, makes my development process SLOW.

- My crap plugin does what it says. Period.

### How to install

- Clone this plugin into your custom/plugins folder

```
cd my-shopware-project/custom/plugins;

git clone https://github.com/pthreat/FIFOShopwareEvents
```

- In the root folder of this plugin, run this command:

```
mkfifo fifo; chmod 666 fifo 
```

- Login to your shopware backend and go to the Custom > Plugins menu
- Install this plugin and activate it
- Once the plugin is installed and active, proceed to:

```
tail -f fifo
```

In this very same folder.

As this plugin is very fast, your performance will have little to no degradation.

### Examples

```
For all of the following examples, you are supposed to be standing at this plugin's folder:
```

Tail the fifo file, filter through all events which contain the "basket" string 

```
tail -f ./fifo | grep  -i basket
```

Dump all events to a physical "out" file for later analysis 

```
tail -f ./fifo > out
```

### FAQ

- Q: Will this completely fuck my disk space?
- A: No, FIFO's are files which weigh 0 bytes, everything that is written to them is discarded as soon as it comes in

- Q: I want to save the shit to a file so I can do more debugging
- A: See examples above

- Q: Can I also dump the arguments?
- A: Yes, just open Components/ExtendedEventManager.php and add the arguments as an additional parameter, I personally don't care for them as it can be a lot of data

- Q: Will this also show events from my plugins?
- A: Every event that you fire in any plugin will be shown

- Q: Does it debug console events?
- A: Every single event
