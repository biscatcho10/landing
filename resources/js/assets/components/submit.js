import React from 'react';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome';
import {library} from '@fortawesome/fontawesome-svg-core'
import {faChevronRight} from '@fortawesome/free-solid-svg-icons'

library.add(faChevronRight)

function Submit(props) {
    return (
        <div className="button_container">
            <button className="button" type="submit">
                SEND
                <span className="icon_arrow">
                    <FontAwesomeIcon icon="chevron-right"/>
                </span>
            </button>
        </div>
    );
}

export default Submit;
