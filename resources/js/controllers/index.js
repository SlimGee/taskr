// This file is auto-generated by `php artisan stimulus:install`
// Run that command whenever you add a new controller or create them with
// `php artisan stimulus:make controllerName`

import { application } from '../libs/stimulus'


import FlashController from './flash_controller'
application.register('flash', FlashController)

import HelloController from './hello_controller'
application.register('hello', HelloController)

import Milkdown__Controllers__LinkController from './milkdown/controllers/link_controller'
application.register('milkdown--controllers--link', Milkdown__Controllers__LinkController)

import Milkdown__Controllers__SlashController from './milkdown/controllers/slash_controller'
application.register('milkdown--controllers--slash', Milkdown__Controllers__SlashController)

import Milkdown__Controllers__ToolbarController from './milkdown/controllers/toolbar_controller'
application.register('milkdown--controllers--toolbar', Milkdown__Controllers__ToolbarController)

import Milkdown__Controllers__TooltipController from './milkdown/controllers/tooltip_controller'
application.register('milkdown--controllers--tooltip', Milkdown__Controllers__TooltipController)

import MilkdownController from './milkdown_controller'
application.register('milkdown', MilkdownController)