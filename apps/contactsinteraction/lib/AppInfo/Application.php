<?php

declare(strict_types=1);

/**
 * @copyright 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2020 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\ContactsInteraction\AppInfo;

use OCA\ContactsInteraction\AddressBook;
use OCA\ContactsInteraction\Listeners\ContactInteractionListener;
use OCA\ContactsInteraction\Store;
use OCP\AppFramework\App;
use OCP\AppFramework\IAppContainer;
use OCP\Contacts\Events\ContactInteractedWithEvent;
use OCP\EventDispatcher\IEventDispatcher;
use OCP\EventDispatcher\IEventListener;
use OCP\IL10N;

class Application extends App {

	public const APP_ID = 'contactsinteraction';

	public function __construct() {
		parent::__construct(self::APP_ID);

		$this->registerListeners($this->getContainer()->query(IEventDispatcher::class));
	}

	private function registerListeners(IEventDispatcher $dispatcher): void {
		$dispatcher->addServiceListener(ContactInteractedWithEvent::class, ContactInteractionListener::class);
	}

}
