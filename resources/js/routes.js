import {runTournament} from "./tournament";

export function router(page) {
    if (page === 'tournament') {
        runTournament();
    }
}
