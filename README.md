# Remote Control
## How to use
1. Clone the repository
2. Move to the project dir
3. Run command `php control.php` to get a list of available commands
## Commands
```            
list                        displays a list of device names
state                       displays current state of the control
add <position> <device>     binds a button to the device
press <position> <on|off>   performs an action on the button
undo                        cancels the last action
```            
## Examples
Command:
```
php control.php list
```
Result:
```
light
door
garage
heating
jacuzzi
jalousie
kettle
```
---
Command:
```
php control.php add 1 door
```
Result:
```
Position #1 has been binded
```