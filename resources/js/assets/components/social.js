import React from 'react';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome';
import {library} from '@fortawesome/fontawesome-svg-core'
import {faChevronRight} from '@fortawesome/free-solid-svg-icons'
import {
    fab,
    faBehance,
    faFacebookF,
    faInstagram, faLinkedinIn,
    faWhatsapp,
    faYoutube,
} from '@fortawesome/free-brands-svg-icons'


library.add(fab, faFacebookF, faInstagram, faWhatsapp, faYoutube, faBehance, faLinkedinIn)

function Social(props) {
    return (
        <div className="social">
            <a href="https://www.facebook.com/CreativeTwinkles" target="_blank" className="icon facebook">
                <FontAwesomeIcon size="lg" icon={["fab", "facebook-f"]} color="white"/>
            </a>
            <a href="https://www.instagram.com/creative.twinkles/" target="_blank" className="icon instagram">
                <FontAwesomeIcon size="lg" icon={["fab", "instagram"]}/>
            </a>
            <a href="https://wa.me/+201002106315" target="_blank" className="icon whatsapp">
                <FontAwesomeIcon size="lg" icon={["fab", "whatsapp"]}/>
            </a>
            <a href="https://www.behance.net/CreativeTwinkles" target="_blank" className="icon behance">
                <FontAwesomeIcon size="lg" icon={["fab", "behance"]}/>
            </a>
            <a href="https://www.youtube.com/channel/UCwGMDMJdKjgBdeJY-LWYSsg" target="_blank" className="icon youtube">
                <FontAwesomeIcon size="lg" icon={["fab", "youtube"]}/>
            </a>
            <a href="https://www.linkedin.com/company/creativetwinkles/" target="_blank" className="icon linkedin">
                <FontAwesomeIcon size="lg" icon={["fab", "linkedin-in"]}/>
            </a>
        </div>
    );
}

export default Social;
