import {runTournament} from "./tournament";
import {runTest} from "./test";
import {runResults} from "./results";

export function router(page) {
    if (page === 'tournament') {
        runTournament();
    } else if (page === 'results') {
        runResults();
    } else if (page === 'test') {
        runTest();
    }
}
