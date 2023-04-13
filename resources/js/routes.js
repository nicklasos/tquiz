import {runTournament} from "./tournament";

export function router(page) {
    if (page === 'tournament') {
        runTournament();
    } else if (page === 'home') {
        console.log('Home');
    }
}
