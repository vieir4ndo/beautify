import { app } from './app';

const PORT = process.env.API_PORT ?? 3000;

const server = app.listen(PORT, () => console.log('App listening on port: ' + PORT));

process.on('SIGINT', () => {
    server.close();
});
