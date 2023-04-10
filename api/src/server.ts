import { app } from './app';

const PORT = (process.env.API_PORT == null) ? 3000 : process.env.API_PORT;

const server = app.listen(PORT, () => console.log('App listening on port: ' + PORT));

process.on('SIGINT', () => {
    server.close();
});
