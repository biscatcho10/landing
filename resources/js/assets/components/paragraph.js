import React, {useEffect, useState} from 'react';
import axios from "axios";

function Paragraph(props) {

    let [paragraph, setParagraph] = useState(null)

    useEffect(() => {
        axios.get("/api/action",
            data => data.data
        ).then(r => {
            let {data} = r;
            if (data !== undefined && data.description !== undefined) {
                setParagraph(data.description)
            }
        }).catch(err => console.log(err))
    }, [])

    return (
        <div className="paragraph">
            <p>
                {paragraph}
            </p>
        </div>
    );
}

export default Paragraph;
