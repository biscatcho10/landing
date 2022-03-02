import React from 'react';

function Copyright(props) {
    const year = new Date().getFullYear();
    return (
        <div className="copyright">
            © {year} Creative twinkles agency, Powered by Creative Twinkles
        </div>
    );
}

export default Copyright;
