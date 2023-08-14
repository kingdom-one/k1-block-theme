import { library, dom } from '@fortawesome/fontawesome-svg-core';
import {
	faFacebook,
	faInstagram,
	faLinkedin,
} from '@fortawesome/free-brands-svg-icons';

library.add(faFacebook, faInstagram, faLinkedin);

/**
 * Replaces any existing <i> tags with <svg>
 * Sets up a MutationObserver to continue doing this as the DOM changes.
 */
dom.watch();
