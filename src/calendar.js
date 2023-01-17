import React from "react";



import { createRoot } from 'react-dom/client';

import { PopupButton } from "react-calendly";

const App = () => {
    return (
        <div className="App">
            <PopupButton
                className={"btn btn-primary"}
                styles={{ height: '100%' }}
                url="https://calendly.com/unixdevil/15min"
                /*
                 * react-calendly uses React's Portal feature (https://reactjs.org/docs/portals.html) to render the popup modal. As a result, you'll need to
                 * specify the rootElement property to ensure that the modal is inserted into the correct domNode.
                 */
                rootElement={document.getElementById("calendar")}
                text="Setup a meeting!"
            />
        </div>
    );
};

export default App;

if (document.getElementById('calendar')) {

    const container = document.getElementById('calendar');
    const root = createRoot(container); // createRoot(container!) if you use TypeScript
    root.render(<App/>);
}
