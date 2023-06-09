import * as bodyParser from 'body-parser';
import * as express from 'express';
import * as cors from 'cors';
import * as logger from 'morgan';
import { AppDataSource } from "./data-source"
import { routerUser } from './routes/user';

export const app = express();

const whitelist = ["http://localhost:3001"]
const corsOptions = {
  origin: function (origin, callback) {
    if (!origin || whitelist.indexOf(origin) !== -1) {
      callback(null, true)
    } else {
      callback(new Error("Not allowed by CORS"))
    }
  },
  credentials: true,
}

AppDataSource.initialize().then(async () => {

    app.use(cors(corsOptions));

    app.use(bodyParser.json());

    app.use(logger('dev'));

    app.use('/user', routerUser);

}).catch(error => console.log(error));
