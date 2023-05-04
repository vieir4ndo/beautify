import * as bodyParser from 'body-parser';
import * as express from 'express';
import * as cors from 'cors';
import * as logger from 'morgan';
import { AppDataSource } from "./data-source"
import { routerUser } from './routes/user';
import * as Validator from 'validatorjs';
import { UserService } from './services/UserService';

const userService = new UserService();

export const app = express();

AppDataSource.initialize().then(async () => {

    Validator.useLang('pt');
    
    Validator.registerAsync('email_available', async function (email, attribute, req, passes) {
        if (await userService.getByEmail(email)) {
            passes(false, 'E-mail já cadastrado.'); // if email is not available
        } else {
            passes(); // if email is available
        }
    });

    Validator.register('phone_number', function (phone, req, attribute) {
        return phone.length === 14;
    }, 'O :attribute não é um número de telefone válido');

    app.use(cors());

    app.use(bodyParser.json());

    app.use(logger('dev'));

    app.use('/user', routerUser);

    app.use('/', (request, response) => response.send('Beautify API'));
    
}).catch(error => console.log(error));
