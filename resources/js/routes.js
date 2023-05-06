import {runTournament} from "./tournament";
import {runTest} from "./test";
import {runResults} from "./results";
import {runHome} from "./home";


export function router(page) {
    let routes = {
        tournament: runTournament,
        results: runResults,
        home: runHome,
        test: runTest,
    };

    if (routes.hasOwnProperty(page)) {
        routes[page]();
    }
}
