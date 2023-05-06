import {runTournament} from "./tournament";
import {runTest} from "./test";
import {runResults} from "./results";
import {runHome} from "./home";


export function router(page) {
    if (page === 'tournament') {
        runTournament();
    } else if (page === 'results') {
        runResults();
    } else if (page === 'test') {
        runTest();
    } else if (page === 'home') {
        runHome();
    }
}
