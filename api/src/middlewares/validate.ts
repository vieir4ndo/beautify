import { Request, Response, NextFunction } from 'express';

export const validate =
    (schema: any) =>
        (req: Request, res: Response, next: NextFunction) => {
            try {
                debugger;
                schema.parse({
                    params: req.params,
                    query: req.query,
                    body: req.body,
                });

                next();
            } catch (error) {
                if (error instanceof InvalidRequestError) {
                    return res.status(400).json({
                        status: 'fail',
                        errors: error.errors,
                    });
                }

                if (error instanceof NotFoundError) {
                    return res.status(404).json({
                        status: 'not found',
                        errors: error.errors,
                    });
                }

                next(error);
            }
        };
