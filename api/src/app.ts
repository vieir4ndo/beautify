import * as bodyParser from 'body-parser';
import * as express from 'express';
import * as cors from 'cors';
import * as logger from 'morgan';
import { AppDataSource } from "./data-source"
import { routerUser } from './routes/user';
import { errorHandler, myLogger } from './middlewares/errorHandler';

export const app = express();

AppDataSource.initialize().then(async () => {

    app.use(myLogger)

    app.use(cors());

    app.use(bodyParser.json());

    app.use(logger('dev'));

    app.use('/user', routerUser);

    app.use('/', (request, response) => response.send('Beautify API'));
    
}).catch(error => console.log(error));
