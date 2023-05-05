import { Request, Response, NextFunction } from 'express';
import { InvalidRequestError } from '../errors';

export const myLogger = function (req, res, next) {
    try {
        console.log('LOGGED')
        next()
    }
    catch (error: any) {
        console.log("meu log" + error.message);
    }
}

export const errorHandler = (
    req: Request,
    res: Response,
    next: NextFunction
) => {
    try {
        next();
    } catch (error: any) {

        if (error instanceof InvalidRequestError) {
            console.log("devia dar erro");
            return res.status(400).json({
                status: 'fail',
                errors: error.message,
            }).send();
        }

        next(error);
    }
};